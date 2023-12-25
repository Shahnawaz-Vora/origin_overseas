#!/usr/bin/env python
import mysql.connector
import sys
from difflib import SequenceMatcher
import language_tool_python
tool = language_tool_python.LanguageTool('en-US')

conn = mysql.connector.connect(host="localhost",port="3306", user="root", passwd="", database="test")
user_cursor = conn.cursor()
if(sys.argv[2] == "summarize-written-text"):
  user_cursor.execute("select * from material_writing where writingMaterialId ="+sys.argv[1])  
elif(sys.argv[2] == "essay"):
  user_cursor.execute("select * from material_writing where writingMaterialId ="+sys.argv[1])  
elif(sys.argv[2]== "summarize-spoken-text"):
  user_cursor.execute("select * from material_listening where listeningMaterialId ="+sys.argv[1])  
elif(sys.argv[2] == "write-from-dictation"):
  user_cursor.execute("select * from material_listening where listeningMaterialId ="+sys.argv[1])  
pass 

user_rec= user_cursor.fetchone()
text = sys.argv[3]

marks_content = 0
marks_vocab = 0
marks_grammer = 0
marks_spell=0

if len(text)== 0:
  response = [marks_content, marks_vocab, marks_grammer, marks_spell,0, "Answer is empty"]
  print(response)
  user_cursor.close()
  conn.close()
else:  

  # get the matches
  matches = tool.check(text)

  j=0
  content = 0
  vocab = 0
  grammer = 0
  spell=0
  # print(matches) 
  for x in range(len(matches)): 
    err= matches[j].message
    cat= matches[j].category
      
    #vocab error
    if(err.__contains__("repeated")):
      vocab+=1
    pass

    #grammar error
    if(cat == "GRAMMAR" or err.__contains__("vowel")):
      grammer=grammer+1
    pass
    
    # #content error
    # if cat == "CASING" or cat == "CONFUSED_WORDS" or cat == "REDUNDANCY" or cat == "SEMANTICS":
    #   content+=1
    # pass

    #spelling mistake
    if(cat == "TYPOS" or err.__contains__("Possible spelling mistake found")):
      spell+=1

    j=j+1
    pass

  # marks calcluation of spelling
  if spell == 0:
    spell_marks = 22.5
  elif spell == 1:
    spell_marks = 11.25 
  elif spell >1:
    spell_marks = 0
  pass

  # to match the similarity of both content
  def similar(a, b):
    return (SequenceMatcher(None, a, b).ratio())

  # marks calcluation of grammer
  if(sys.argv[2] == "summarize-written-text"):
    answer = user_rec[3]
  elif(sys.argv[2] == "essay"):
    answer = user_rec[3]
  elif(sys.argv[2]== "summarize-spoken-text"):
    answer = user_rec[1]
  elif(sys.argv[2] == "write-from-dictation"):
    answer = user_rec[1]
  pass 

  if grammer == 0:
    grammer_marks = round((similar(answer,text)*22.5),3)
  elif grammer >= 1 or grammer <=3:
    grammer_marks = round(similar(answer,text)*(22.5-(5.625*grammer)),3) 
  elif grammer >= 4:
    grammer_marks = 0
  pass

  # marks calcluation of word repeat
  if vocab == 0:
    vocab_marks = 22.5
  elif vocab >= 1 or vocab <=14:
    vocab_marks = round((22.5-(1.5*vocab)),3)
  elif vocab >= 15:
    vocab_marks = 0
  pass


  # for print all errors messages
  comments= "comments: <br>"
  for mistake in matches: 
    comments=comments+"<br>"+str(mistake)
  

  if(sys.argv[2] == "summarize-written-text"):
    content_marks =round((similar(user_rec[3],text)*22.5),3)
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    if(total == 0):
      marks=0
    else:
      marks = round(((total*30)/90)*similar(user_rec[3],text),3)
    pass
    response = [content_marks, vocab_marks, grammer_marks, spell_marks, comments]
    print(response)
  elif(sys.argv[2] == "essay"):
    content_marks =round((similar(user_rec[3],text)*22.5),3)
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    if(total == 0):
      marks=0
    else:  
      marks = (total*similar(user_rec[3],text))
    pass
    response = [content_marks, vocab_marks, grammer_marks, spell_marks, comments]
    print(response)
  elif(sys.argv[2]== "summarize-spoken-text"):
    content_marks =round((similar(user_rec[1],text)*22.5),3)
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    if(total == 0):
      marks=0
    else:
      marks = ((total*30)/90)*similar(user_rec[1],text)
    pass
    response = [content_marks, vocab_marks, grammer_marks, spell_marks, comments]
    print(response)
  elif(sys.argv[2] == "write-from-dictation"):
    user_ans = text.split()
    test_ans = user_rec[1].split()
    length = min(len(user_ans),len(test_ans))
    marks=0
    for z in range(length):
      if(user_ans[z] == test_ans[z]):
        marks += 1
    response = round(22.5*marks/len(test_ans),3)
    print(response)
  pass
  user_cursor.close()
  conn.close()
pass

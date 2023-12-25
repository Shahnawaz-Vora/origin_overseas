#!/usr/bin/env python
import mysql.connector
import sys
from difflib import SequenceMatcher
import language_tool_python
tool = language_tool_python.LanguageTool('en-US')

conn = mysql.connector.connect(host="localhost",port="3306", user="root", passwd="", database="test")
user_cursor = conn.cursor()
# cursor.execute("select * from test where test_no ="+sys.argv[1]+" and question_no="+sys.argv[2])
 
user_cursor.execute("select * from user_test where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and type='"+sys.argv[
  4]+"' and studentId="+sys.argv[3])
user_rec= user_cursor.fetchone()
text = user_rec[7]

marks_content = 0
marks_vocab = 0
marks_grammer = 0
marks_spell=0

update_cursor = conn.cursor()
if len(text)== 0:
  print("Answer is empty")
  update_cursor.execute("UPDATE user_test SET marks='0', content ='0', vocabulary='0' , grammar='0' , spelling='0' where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and studentId="+sys.argv[3])
  conn.commit()
  update_cursor.close()
  user_cursor.close()
  conn.close()
else:  
  cursor = conn.cursor()
  cursor.execute("select * from test where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[5]+" and type='"+sys.argv[4]+"'")
  rec= cursor.fetchone()

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
    if(cat == "TYPOS" or err.__contains__("spelling mistake")):
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



  # marks calcluation of grammer
  if grammer == 0:
    grammer_marks = 22.5
  elif grammer >= 1 or grammer <=3:
    grammer_marks = round((22.5-(5.625*grammer)),3); 
  elif grammer >= 4:
    grammer_marks = 0
  pass

  # marks calcluation of word repeat
  if vocab == 0:
    vocab_marks = 22.5
  elif vocab >= 1 or vocab <=14:
    vocab_marks = round((22.5-(1.5*vocab)),3); 
  elif vocab >= 15:
    vocab_marks = 0
  pass

  # to match the similarity of both content

  def similar(a, b):
      return (SequenceMatcher(None, a, b).ratio())
    

  content_marks =round((similar(rec[8],text)*22.5),3)

  # for print all errors messages
  comments= "comments: <br>"
  for mistake in matches: 
    comments=comments+"<br>"+str(mistake)
  

  if("summarize-written-text" == "summarize-written-text"):
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    marks = round(((total*30)/90)*similar(rec[8],text),3)
    update_cursor.execute("UPDATE user_test SET marks='"+str(marks)+"', content ='"+str(content_marks)+"', vocabulary='"+str(vocab_marks)+"' , grammar='"+str(grammer_marks)+"' , spelling='"+str(spell_marks)+"' , comments='"+comments+"' where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and studentId="+sys.argv[3])
    conn.commit()
    
  elif(type == "essay"):
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    marks = (total*similar(rec[8],text))
    update_cursor.execute("UPDATE user_test SET marks='"+str(marks)+"', content ='"+str(content_marks)+"', vocabulary='"+str(vocab_marks)+"' , grammar='"+str(grammer_marks)+"' , spelling='"+str(spell_marks)+"' , comments='"+comments+"' where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and studentId="+sys.argv[3])
    conn.commit()
  elif(type== "summarize-spoken-text"):
    total = content_marks+vocab_marks+grammer_marks+spell_marks
    marks = ((total*30)/90)*similar(rec[8],text)
    update_cursor.execute("UPDATE user_test SET marks='"+str(marks)+"', content ='"+str(content_marks)+"', vocabulary='"+str(vocab_marks)+"' , grammar='"+str(grammer_marks)+"' , spelling='"+str(spell_marks)+"' , comments='"+comments+"' where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and studentId="+sys.argv[3])
    conn.commit()
  elif(type == "write-from-dictation"):
    marks = round((22.5 - (90/user_rec[7])*spell).similar(rec[8],user_rec[7]),3)
    update_cursor.execute("UPDATE user_test SET marks='"+str(marks)+"' where test_no ='"+sys.argv[1]+"' and question_no="+sys.argv[2]+" and studentId="+sys.argv[3])
  pass
  update_cursor.close()
  cursor.close()
  user_cursor.close()
  conn.close()
pass

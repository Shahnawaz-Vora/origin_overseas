let device = navigator.mediaDevices.getUserMedia({ audio:true });
  let chunks = [];
  let recorder;
  device.then(stream => {
    recorder = new MediaRecorder(stream);
    recorder.ondataavailable = e => {
      chunks.push(e.data);
      if(recorder.state == 'inactive') {
        let blob = new Blob(chunks, {type: 'audio/webm'})
        document.getElementById('audio').innerHTML = '<source src="'+ URL.createObjectURL(blob) +'" type="audio/wav" />' 
      }
    }
    recorder.start(60000);
  });
  setTimeout(() => {
    recorder.stop()
  },45000);
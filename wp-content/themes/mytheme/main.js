
//boutons
let envoyer = document.querySelector('#envoyer')//clcik 1
let fin = document.querySelector('#fin')//click fin
let scan = document.querySelector('#form-qr')//click for scan

//section
let sectionLog = document.querySelector('.section-log')
let sectionActivite = document.querySelector('.section-activite')
let sectionResultat = document.querySelector('.section-resultat')
let sectionScan = document.querySelector('.section-scan')

//let output = document.querySelector('.output')
//Sortie
let outputTitre = document.querySelector('.output-titre')
let outputDate = document.querySelector('.output-date')
let outputChoix = document.querySelector('.output-choix')
let outputSalle = document.querySelector('.output-salle')
let outputImage = document.querySelector('.output-image')

//variables
let imageProfil =""
let rgpd = ""
let date= new Date().toLocaleString();
const visiteur = new Object()

const url_api = "https://exo1-cab1c.firebaseio.com/exo1-cab1c.json"


  
//1erChamps
envoyer.addEventListener('click',  ()=> { 

    //input
    let nom = document.querySelector('#nom').value
    let prenom = document.querySelector('#prenom').value
    let email = document.querySelector('#email').value
    
    visiteur.nom = nom
    visiteur.prenom = prenom
    visiteur.email = email
    visiteur.date = date
   

   if(rgpd){
    sectionLog.classList.add('hidden')
    sectionActivite.classList.remove('hidden')
   }else{
       
       alert('merci de bien voiloir accpeter les terms')
   }
   outputTitre.innerHTML = prenom +" - "+ nom 
   outputDate.innerHTML = date
  
})
// vers scan
scan.addEventListener('click', () => {
    sectionLog.classList.add('hidden')
    sectionScan.classList.remove('hidden')
})
//check rgpd
document.getElementById('check').onclick = function() {
  // access properties using this keyword
  if ( this.checked ) {
      rgpd = true
      
  } else {
      // Returns false if not checked
      rgpd = false
      
  }
};
//check choix & salle
let checkbox2 = document.querySelector('.check2')
    checkbox2.addEventListener('click',  (e) => {
        let choix = e.target.parentElement.querySelector('a').innerHTML
        let salle = e.target.id

       //console.log(choix, salle)
        visiteur.choix = [choix, salle]
        outputChoix.innerHTML = "Votre choix : " + choix
        outputSalle.innerHTML = " Dans la salle numero : " + salle
   
    })
// vers dernier volet
fin.addEventListener('click', () => {
    sectionActivite.classList.add('hidden')
    sectionResultat.classList.remove('hidden')

    axios.post( url_api, visiteur)
      .then((response) => {
        let qrcode = new QRCode(document.getElementById("qrcode"));
        function makeCode () {		
            let elText = response.data.name

            qrcode.makeCode(elText);
        }
        makeCode()
      }, (error) => {
        console.log(error);
      });

})

// Cam + photo
var constraints = { audio: false, video: { width: 300, height: 300 } }; 

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
  var video = document.querySelector('video');
  video.srcObject = mediaStream;
  video.onloadedmetadata = function(e) {
    video.play();
  };
  //capture
  let image = document.getElementById('image')
    context = image.getContext('2d')

    document.querySelector('.snap').addEventListener('click', () => {
        //dessine image quand click button
        context.drawImage(video, 0,0, image.width, image.height )
        imageProfil = image.toDataURL()
        //window.location.href=imageProfil
        visiteur.image = imageProfil
        document.getElementById("the-image").src = imageProfil
        
    })
    
})
.catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.

//scan

let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
axios.get
scanner.addListener('scan', function (content) {
  console.log(content);
  if(content){
    axios.get("https://exo1-cab1c.firebaseio.com/exo1-cab1c.json")
  .then(function (response) {
    // handle success
  if(response.data === content){
    console.log("ok")
    sectionScan.classList.add('hidden')
    sectionActivite.classList.remove('hidden')
  }else{
    setTimeout(function(){
      sectionScan.classList.add('hidden')
      sectionActivite.classList.remove('hidden')
    }, 1000)
  }
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  }
});
Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);
  } else {
    console.error('No cameras found.');
  }
}).catch(function (e) {
  console.error(e);
});
      
    





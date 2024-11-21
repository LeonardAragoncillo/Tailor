 document.getElementById('uploadButton').addEventListener('click', function() {
    const fileInput = document.getElementById('measurementPicture');
    
    if (fileInput.files.length > 0) {
    } else {
        alert('Please select a picture to upload.');
    }
});

document.getElementById('noPictureButton').addEventListener('click', function() {
    document.getElementById('uploadForm').classList.add('hidden');
    document.getElementById('measurementSection').classList.remove('hidden');
});

document.getElementById('measurementForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const chest = document.getElementById('chest').value;
    const waist = document.getElementById('waist').value;
    const hip = document.getElementById('hip').value;
    const inseam = document.getElementById('inseam').value;
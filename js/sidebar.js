document.getElementById('hamburger-menu').addEventListener('click', function() {
    document.getElementById('sidebar').style.width = '250px';
    document.getElementById('overlay').style.width = '100%';
});

document.getElementById('overlay').addEventListener('click', function() {
    document.getElementById('sidebar').style.width = '0';
    document.getElementById('overlay').style.width = '0';
});

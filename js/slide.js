document.getElementById( 'slide' ).addEventListener( 'click', function() {
 
    ( this.style.height == '50px' || this.style.height == '' )
        ? this.style.height = '150px' 
        : this.style.height = '50px';
    
}, false );
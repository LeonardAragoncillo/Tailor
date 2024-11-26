function filterOrders(status) {
    const items = document.querySelectorAll('.order-item');
    const links = document.querySelectorAll('ul li a');

    items.forEach(item => {
        if (status === 'all') {
            item.style.display = 'flex'; // Show all items
        } else if (status === 'unpaid' && item.classList.contains('unpaid')) {
            item.style.display = 'flex'; // Show unpaid items
        } else if (status === 'fullypaid' && item.classList.contains('fullypaid')) {
            item.style.display = 'flex'; // Show fully paid items
        } else {
            item.style.display = 'none'; // Hide other items
        }
    });

    // Remove active class from all links
    links.forEach(link => {
        link.classList.remove('active');
    });

    // Add active class to the clicked link
    const activeLink = Array.from(links).find(link => link.textContent.toLowerCase() === status);
    if (activeLink) {
        activeLink.classList.add('active');
    }
}
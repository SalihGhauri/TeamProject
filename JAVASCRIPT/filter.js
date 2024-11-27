function redirectToCategory(category) {
    switch (category) {
        case 'basketball':
            window.location.href = 'basketball.html';
            break;
        case 'football':
            window.location.href = 'football.html'; 
            break;
        case 'rugby':
            window.location.href = 'rugby.html'; 
            break;
        case 'volleyball':
            window.location.href = 'volleyball.html'; 
            break;
        case 'golf':
            window.location.href = 'golf.html'; 
            break;
        default:
            alert('Invalid category selected'); 
    }
}

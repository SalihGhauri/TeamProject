function redirectToCategory(clothing) {
    switch (clothing) {
        case 'vests':
            window.location.href = 'vests.html';
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
        default:
            alert('Invalid category selected');
    }
}

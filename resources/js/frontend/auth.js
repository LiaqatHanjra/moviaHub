export function isLoggedIn() {
    return Boolean(localStorage.getItem('token'));
}

export function currentUserName() {
    return localStorage.getItem('userName') || 'Account';
}

export function logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('userName');
    localStorage.removeItem('admin');
    window.location.href = '/';
}

function hasCoockie(name){
    const cookie = document.cookie
    .split(';')
    .find(fn => {
        const [cookieName] = fn.trim().split('=');
        return cookieName === name;
    });

}

export default hasCoockie;
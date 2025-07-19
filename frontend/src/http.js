import axios from 'axios';

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const http = axios.create({
    baseURL: 'http://localhost:8000',
    withCredentials: true, // Обязательно для кук
});

http.interceptors.request.use(async (config) => {
    const token = localStorage.getItem('token');
    if(token != null){
        config.headers.Authorization = `Bearer ${token}`;
    }
    if (!config.url.includes('/sanctum/csrf-cookie')) {
        await http.get('/sanctum/csrf-cookie');
    }
    return config;
});

export default http;
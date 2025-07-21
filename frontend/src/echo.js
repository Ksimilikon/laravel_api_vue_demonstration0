import axios from "axios";
import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;
async function fetchCsrfToken() {
  try {
    await axios.get(`${import.meta.env.VITE_API_URL}/sanctum/csrf-cookie`, {
      withCredentials: true
    });
    return getCookie('XSRF-TOKEN');
  } catch (error) {
    console.error('CSRF token fetch failed:', error);
    return null;
  }
}

// const echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: 'localhost',
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
//     wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
//     authEndpoint: `${import.meta.env.VITE_API_URL}/sanctum/csrf-cookie`,
//     auth: {
//         headers: {
//             'Authorization': `Bearer ${localStorage.getItem('token')}`,
//             'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
//         }
//     }
// });
async function initializeEcho() {
  const csrfToken = await fetchCsrfToken();
  
  return new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT || 80,
    wssPort: import.meta.env.VITE_REVERB_PORT || 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME || 'https') === 'https',
    enabled: true,
    auth: {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
        'X-XSRF-TOKEN': csrfToken,
        'Accept': 'application/json',
      },
    },
    authEndpoint: `${import.meta.env.VITE_API_URL}/broadcasting/auth`,
  });
}
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export default initializeEcho;

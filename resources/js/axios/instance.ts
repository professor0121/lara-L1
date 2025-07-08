import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000/api', // Laravel API URL
  headers: {
    'Content-Type': 'application/json',
  },
  withCredentials: true, // Needed for Sanctum (cookies)
});

// OPTIONAL: Automatically attach auth token (if stored in localStorage)
axiosInstance.interceptors.request.use((config) => {
  const token = localStorage.getItem('token'); // or use Context or Cookies
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export default axiosInstance;

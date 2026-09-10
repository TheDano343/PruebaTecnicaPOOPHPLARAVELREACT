import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import Web from './Routes/web'; // Tu componente actual

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <BrowserRouter>
      <Web />
    </BrowserRouter>
  </React.StrictMode>
);

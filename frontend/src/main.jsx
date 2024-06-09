import React from 'react'
import ReactDOM from 'react-dom'
import './index.css'
import {BrowserRouter as Router, Routes, Route} from "react-router-dom";
import Home from "./pages/Home/index.jsx";

ReactDOM.createRoot(
    document.getElementById('root')
).render(
    <React.StrictMode>
        <Router>
            <Routes>
                <Route path="/" element={<Home />} />
            </Routes>
        </Router>
    </React.StrictMode>,
)

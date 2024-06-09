import React from 'react'
import ReactDOM from 'react-dom'
import './index.css'
import HomePage from "./HomePage.jsx";
import {BrowserRouter as Router, Routes, Route} from "react-router-dom";

ReactDOM.createRoot(
    document.getElementById('root')
).render(
    <React.StrictMode>
        <Router>
            <Routes>
                <Route path="/" element={<HomePage />} />
            </Routes>
        </Router>
    </React.StrictMode>,
)

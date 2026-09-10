import React from 'react'
import { Route, Routes } from 'react-router-dom'
import Home from '../Views/Home';
import Navbar from '../Layouts/Navbar';
import Tarea from '../Views/Tarea';

export default function web() {
    return (
        <div>
            <Navbar/>
            <Routes>
                <Route path="/" element={<Home/>} />
                <Route path="/task" element={<Tarea/>} />
            </Routes>
        </div>
    )
}

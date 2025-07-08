import axios from '../axios/instance'
import React, { use, useEffect } from 'react'



const demo = () => {

    useEffect(() => {
        const response = axios.get('http://localhost:8000/api/products');
        response.then(res => {
            console.log("the data",res.data);
        }).catch(err => {
            console.error(err);
        });
    }, [])

    return (
        <div>
            <h1>Product List</h1>
            <h1>Product List</h1>
        </div>
    )
}

export default demo
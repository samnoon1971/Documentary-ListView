import React from "react";
import axios from "axios";
import HomeButton from "./HomeButton";
import { useCookies } from "react-cookie";

function Dashboard() {

    const [token, setToken] = useCookies(["token"]);
    const TOKEN = token['token'];
    
    const config = {
        headers: {
            Authorization: `Bearer ${TOKEN}`,
        },
    };
    function getData() {
        console.log(token);
        console.log(config);
        axios.get("http://localhost:8000/api/list", config).then((res) => {
            console.log(res);
            console.log(res.data);
        });
    }
    getData();
    return (
        <div>
            <h1>Dashboard</h1>

            <HomeButton />
        </div>
    );
}
export default Dashboard;

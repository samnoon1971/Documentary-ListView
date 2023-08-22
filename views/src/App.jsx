import React, { useState } from "react";
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    Redirect,
} from "react-router-dom";
import Form from "./Form";
import Dashboard from "./Dashboard";

const App = () => {
    const [loggedIn, setLoggedIn] = useState(false);
    function callbackFunction(childData) {
        setLoggedIn(childData);
        console.log(childData);
    }
    return (
        <Router>
            <Switch>
                <Route path="/dashboard">
                    {loggedIn ? <Dashboard /> : <Redirect to="/" />}
                </Route>
                <Route path="/">
                    {loggedIn ? (
                        <Redirect to="/dashboard" />
                    ) : (
                        <Form parentCallback={callbackFunction} />
                    )}
                </Route>
            </Switch>
        </Router>
    );
};
export default App;

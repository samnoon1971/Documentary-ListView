import React, { useState } from "react";
import useForm from "./useForm";
import validate from "./LoginFormValidationRules";
import { Redirect } from "react-router-dom";
import axios from "axios";
import { useCookies } from "react-cookie";

const Form = (props) => {
    const { values, errors, handleChange, handleSubmit } = useForm(
        login,
        validate
    );
    const [token, setToken] = useCookies(["token"]);
    const [loggedIn, setLoggedIn] = useState(false);

    function login() {
        // axios call to login api endpoint

        axios.post("http://localhost:8000/api/login", values).then((res) => {
            console.log(res);
            console.log(res.data);
            setTimeout(() => {
                setToken("token", res.data.access_token);
                console.log(token);
                console.log("HELLO")
                setLoggedIn(true);
                props.parentCallback(true);
                return <Redirect to="/dashboard" />;
            }, 1000);
        });
    }

    return (
        <div className="section is-fullheight">
            {loggedIn && <Redirect to="/default" />}
            <div className="container">
                <div className="column is-6 is-offset-3">
                    <div className="box">
                        <h1>Login</h1>
                        <form onSubmit={handleSubmit} noValidate>
                            <div className="field">
                                <label className="label">Email Address</label>
                                <div className="control">
                                    <input
                                        autoComplete="off"
                                        className={`input ${
                                            errors.email && "is-danger"
                                        }`}
                                        type="email"
                                        name="email"
                                        onChange={handleChange}
                                        value={values.email || ""}
                                        required
                                    />
                                    {errors.email && (
                                        <p className="help is-danger">
                                            {errors.email}
                                        </p>
                                    )}
                                </div>
                            </div>
                            <div className="field">
                                <label className="label">Password</label>
                                <div className="control">
                                    <input
                                        className={`input ${
                                            errors.password && "is-danger"
                                        }`}
                                        type="password"
                                        name="password"
                                        onChange={handleChange}
                                        value={values.password || ""}
                                        required
                                    />
                                </div>
                                {errors.password && (
                                    <p className="help is-danger">
                                        {errors.password}
                                    </p>
                                )}
                            </div>
                            <button
                                type="submit"
                                className="button is-block is-info is-fullwidth"
                            >
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Form;

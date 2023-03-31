// src/components/RegistrationForm/ClientRegistrationForm.js
import React, { useState } from "react";

function ClientRegistrationForm() {
  const [formData, setFormData] = useState({
    firstName: "",
    lastName: "",
    birthDate: "",
  });

  const [errorMessage, setErrorMessage] = useState("");

  const handleChange = (event) => {
    const { name, value } = event.target;
    setFormData({ ...formData, [name]: value });
  };

  const validateForm = () => {
    if (!formData.firstName || !formData.lastName || !formData.birthDate) {
      setErrorMessage("All fields are required.");
      return false;
    }

    const birthDate = new Date(formData.birthDate);
    const now = new Date();
    const age = now.getFullYear() - birthDate.getFullYear();
    if (age < 18) {
      setErrorMessage("You must be at least 18 years old to register.");
      return false;
    }

    setErrorMessage("");
    return true;
  };

  const registerClient = async () => {
    const apiUrl = "/xampp/htdocs/tattoo_studio_api/register.php"; // Replace this with the URL of your register.php file

    try {
      const response = await fetch(apiUrl, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          ...formData,
          user_type: "client",
        }),
      });

      if (!response.ok) {
        throw new Error(`HTTP error ${response.status}`);
      }

      const data = await response.json();
      console.log("Client registration response:", data);
    } catch (error) {
      console.error("Registration failed:", error);
    }
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    if (!validateForm()) {
      return;
    }

    try {
      await registerClient();
      console.log("Registration successful!");
    } catch (error) {
      console.error("Registration failed:", error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label htmlFor="firstName">First Name:</label>
        <input
          type="text"
          name="firstName"
          id="firstName"
          value={formData.firstName}
          onChange={handleChange}
        />
      </div>
      <div>
        <label htmlFor="lastName">Last Name:</label>
        <input
          type="text"
          name="lastName"
          id="lastName"
          value={formData.lastName}
          onChange={handleChange}
        />
      </div>
      <div>
        <label htmlFor="birthDate">Birth Date:</label>
        <input
          type="date"
          name="birthDate"
          id="birthDate"
          value={formData.birthDate}
          onChange={handleChange}
        />
      </div>
      {errorMessage && <p>{errorMessage}</p>}
      <button type="submit">Register</button>
    </form>
  );
}

export default ClientRegistrationForm;

// src/components/RegistrationForm/StudioOwnerRegistrationForm.js
import React, { useState } from "react";

function StudioOwnerRegistrationForm() {
  const [formData, setFormData] = useState({
    fullName: "",
    studioName: "",
    studioNIF: "",
    studioAddress: "",
    operatingHours: "",
  });

  const [errorMessage, setErrorMessage] = useState("");

  const handleChange = (event) => {
    const { name, value } = event.target;
    setFormData({ ...formData, [name]: value });
  };

  const validateForm = () => {
    if (
      !formData.fullName ||
      !formData.studioName ||
      !formData.studioNIF ||
      !formData.studioAddress ||
      !formData.operatingHours
    ) {
      setErrorMessage("All fields are required.");
      return false;
    }
    setErrorMessage("");
    return true;
  };

  const registerStudioOwner = async () => {
    // TODO: Replace with a real API call
    console.log("Studio owner registration data:", formData);
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    if (!validateForm()) {
      return;
    }

    try {
      await registerStudioOwner();
      console.log("Registration successful!");
    } catch (error) {
      console.error("Registration failed:", error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      {/* The rest of the form fields go here */}

      {errorMessage && <p>{errorMessage}</p>}
      <button type="submit">Register</button>
    </form>
  );
}

export default StudioOwnerRegistrationForm;

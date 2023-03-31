import React, { useState } from "react";
import ClientRegistrationForm from "/xampp/htdocs/tattoo_studio_api/src/components/RegistrationForm/ClientRegistrationForm";
import StudioOwnerRegistrationForm from "/xampp/htdocs/tattoo_studio_api/src/components/RegistrationForm/StudioOwnerRegistrationForm";

function App() {
  const [userType, setUserType] = useState("");

  const handleUserTypeSelection = (type) => {
    setUserType(type);
  };

  return (
    <div>
      <h1>Welcome to the Tattoo Studio App! 🤘</h1>
      {!userType && (
        <div>
          <p>Please select your registration type:</p>
          <select onChange={(e) => handleUserTypeSelection(e.target.value)}>
            <option value="">Select user type</option>
            <option value="client">Client</option>
            <option value="studioOwner">Studio Owner</option>
          </select>
        </div>
      )}
      {userType === "client" && <ClientRegistrationForm />}
      {userType === "studioOwner" && <StudioOwnerRegistrationForm />}
    </div>
  );
}

export default App;

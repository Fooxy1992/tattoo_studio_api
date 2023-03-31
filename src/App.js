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
          <button onClick={() => handleUserTypeSelection("client")}>
            Client
          </button>
          <button onClick={() => handleUserTypeSelection("studioOwner")}>
            Studio Owner
          </button>
        </div>
      )}
      {userType === "client" && <ClientRegistrationForm />}
      {userType === "studioOwner" && <StudioOwnerRegistrationForm />}
    </div>
  );
}

export default App;

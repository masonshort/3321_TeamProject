import React from 'react';
import logo from './logo.svg';
//import './App.css';

function App() {
  return (
    <div class="login-page">
        <div class="form">
            <form class="login-form">
                <input type="text" placeholder="user name" />
                <input type="text" placeholder="password" />
                <input type="text" placeholder="email id" />
                <button>Create</button>
                <p class="message">Already Registered? <a href="#">Login</a></p>
            </form>

            {/* <script>
              $('.message a').click(function () {
              $('form').animate({ height: "toggle", opacity: "toggle" }, "slow")};
            });
            </script> */}

            {/* <form class="login-form">
                <input type="text" placeholder="user name" />
                <input type="password" placeholder="password" />
                <button>login</button>
                <p class="message">Not Registered? <a href="#">Register</a></p>
            </form> */}
        </div>
    </div>
  );
}


export default App;

import React, { Component } from 'react';
import { saveAs } from 'file-saver';
import logo from './logo.svg';
//import './App.css';

class App extends Component {
  constructor() {
    super();
    this.state = { registerToggle: false };
    
    this.registerToggle = this.registerToggle.bind(this);
    this.createUser = this.createUser.bind(this);
  
  };

  registerToggle() {
    this.setState({registerToggle: !this.state.registerToggle})
  };

  createUser() {
    var nameField = document.getElementById('nameField').value;
    var passwordField = document.getElementById('passwordField').value;
    var emailField = document.getElementById('emailField').value;
    console.log('blob has blobed');
    var blob = new Blob(['Saved Users','\n','Username: ',nameField,'\n','Password: ',passwordField,'\n',"Email: ",emailField], {type: 'text/plain;charset=utf-8'});
    saveAs(blob, 'SavedUsers.txt');

  };


  render() {
    console.log(this.state.registerToggle)
    return (
      <div className="login-page">
          <div className="form">
            {
              !this.state.registerToggle ? (
                <form className="login-form">
                    <input type="text" id="nameField" placeholder="user name" />
                    <input type="text" id="passwordField" placeholder="password" />
                    <input type="text" id="emailField" placeholder="email id" />
                    <button>Create</button>
                    <p className="message">Already Registered? <a href="#" onClick={this.registerToggle}>Login</a></p>
                </form>
              ) : ( 
              <form className="login-form">
                  <input type="text" placeholder="user name" />
                  <input type="password" placeholder="password" />
                  <button>login</button>
                  <p className="message">Not Registered? <a href="#"onClick={this.registerToggle}>Register</a></p>
              </form>
              )
            }
          </div>
      </div>
    );
  }
}


export default App;

import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../common/services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;

  constructor(
    private formBuilder: FormBuilder, public authService: AuthService, private router: Router
  ) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      userName: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      userType: ['', Validators.required]
    });
  }

  get userName() {
    return this.loginForm.controls['userName'];
  }

  get password() {
    return this.loginForm.controls['password'];
  }

  get userType() {
    return this.loginForm.controls['userType'];
  }

  onSubmit(): void {
    console.log("teste")
    if (this.loginForm.valid) {
      // Perform the login action
      console.log(this.loginForm.value); 
      // Redirect to courses-dashboard
      // this.router.navigate(['/courses-dashboard']);
    }
  }

  onLogin() {
    console.log("onLogin!")
    console.log(this.loginForm);
    if (this.loginForm.valid) {
      console.log("form is valid!")
      this.authService.onLogin(this.loginForm.controls['userName'].value, this.loginForm.controls['password'].value)
      .subscribe((res: any) => {
        console.log(res);
        // Store the access token in the localstorage
        localStorage.setItem('access_token', res.access_token);
        // Navigate to home page
        this.router.navigate(['/']);
      }, (err: any) => {
        // This error can be internal or invalid credentials
        // You need to customize this based on the error.status code
      });
    }
  }

  onLogout(): void {
    this.authService.onLogout()
      .subscribe(() => {
        localStorage.removeItem('access_token');
        this.router.navigate(['/login']);
      });
    }
}

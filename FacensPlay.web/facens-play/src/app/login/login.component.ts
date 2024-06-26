import { Component, EventEmitter, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { LoginService } from '../services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {

  loginForm: FormGroup;

  constructor(
    private fb: FormBuilder,
    private router: Router,
    private loginService: LoginService
  ) { }

  ngOnInit(): void {
    this.loginForm = this.fb.group({
      userProfile: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required]
    });
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
    console.log(this.loginForm.value)
    if (this.loginForm.valid) {
      console.log("form is valid!")
      this.loginService.login(this.loginForm.value["email"], this.loginForm.value["password"])
      .subscribe((res: any) => {
        console.log(res);
        // Store the access token in the localstorage
        localStorage.setItem('access_token', res.access_token);
        // Navigate to home page
        this.router.navigate(['/dashboard']);
      }, (err: any) => {
        // This error can be internal or invalid credentials
        // You need to customize this based on the error.status code
      });
    }
  }

  onLogout(): void {
    this.loginService.logout()
      .subscribe(() => {
        localStorage.removeItem('access_token');
        this.router.navigate(['/login']);
      });
    }
}

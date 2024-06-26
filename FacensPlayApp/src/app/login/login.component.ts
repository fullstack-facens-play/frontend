import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { LoginService } from '../common/services/login.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-component',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup

  constructor(private formBuilder: FormBuilder, private loginService: LoginService, private router: Router) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      userName: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      userType: ['', Validators.required]
    });
  }

  onLogin() {
    console.log("onLogin!")
    if (this.loginForm.valid) {
      console.log("form is valid!")
      this.loginService.login(this.loginForm.controls.userName.value, this.loginForm.controls.password.value)
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
    this.loginService.logout()
      .subscribe(() => {
        localStorage.removeItem('access_token');
        this.router.navigate(['/login']);
      });
  }

}

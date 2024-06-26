import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-suporte',
  templateUrl: './suporte.component.html',
  styleUrl: './suporte.component.css'
})
export class SuporteComponent {

 suporteForm: FormGroup;

  constructor(
    private fb: FormBuilder,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.suporteForm = this.fb.group({
      nome: ['', Validators.required],
      mensagem: ['', [Validators.required]]
    });
  }

  onSubmit() {
    if (this.suporteForm.valid) {
      // Perform the login action
      console.log(this.suporteForm.value);
      // Redirect to courses-dashboard
      // this.router.navigate(['/courses-dashboard']);
    }
  }

}

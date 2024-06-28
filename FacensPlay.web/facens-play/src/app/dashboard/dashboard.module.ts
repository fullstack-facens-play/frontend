import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboardComponent } from './dashboard.component';
import { AuthGuardService } from '../common/services/auth-guard.service';
import { Routes, RouterModule } from '@angular/router';
import { NavbarComponent } from '../navbar/navbar.component';

const routes: Routes = [
  {
    path: '',
    component: DashboardComponent,
    canActivate: [ AuthGuardService ]
  }
];

@NgModule({
  declarations: [
    NavbarComponent,
    DashboardComponent

  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  providers: [
    AuthGuardService
  ]
})
export class DashboardModule { }

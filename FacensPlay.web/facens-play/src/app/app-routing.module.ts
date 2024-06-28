import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

// const routes: Routes = [
//   {path: 'login', component: LoginComponent},
//   {path: 'dashboard', component: DashboardComponent},
//   {path: 'cadastro', component: CadastroUsuarioComponent},
//   {path: 'sobre', component: AboutComponent},
//   {path: 'listar-alunos', component: ListarUsuarioComponent},
//   {path: 'suporte', component: SuporteComponent},
//   {path: '', redirectTo:'/login', pathMatch: 'full'},
// ];

const routes: Routes = [
  {
    path: '',
    loadChildren: () => import('./dashboard/dashboard.module').then(m => m.DashboardModule)
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then(m => m.LoginModule)
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

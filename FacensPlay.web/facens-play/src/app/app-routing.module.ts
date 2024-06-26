import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { CadastroUsuarioComponent } from './cadastro-usuario/cadastro-usuario.component';
import { AboutComponent } from './about/about.component';
import { ListarUsuarioComponent } from './listar-usuario/listar-usuario.component';
import { SuporteComponent } from './suporte/suporte.component';

const routes: Routes = [
  {path: 'login', component: LoginComponent},
  {path: 'dashboard', component: DashboardComponent},
  {path: 'cadastro', component: CadastroUsuarioComponent},
  {path: 'sobre', component: AboutComponent},
  {path: 'listar-alunos', component: ListarUsuarioComponent},
  {path: 'suporte', component: SuporteComponent},
  {path: '', redirectTo:'/login', pathMatch: 'full'},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

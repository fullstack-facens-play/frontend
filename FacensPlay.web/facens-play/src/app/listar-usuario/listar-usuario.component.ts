import { Component } from '@angular/core';
import { UsuarioService } from '../services/usuario.service';

@Component({
  selector: 'app-listar-usuario',
  templateUrl: './listar-usuario.component.html',
  styleUrl: './listar-usuario.component.css'
})
export class ListarUsuarioComponent {

  //users: any[] = [];

  users = [
    {
      id: '1',
      nome: 'Rafael',
      email: 'rafael@teste',
    },
    {
      id: '2',
      nome: 'João',
      email: 'joao@teste',
    },
    {
      id: '3',
      nome: 'Lucas',
      email: 'lucas@teste',
    }
  ];

  constructor(private usuarioService: UsuarioService) { }

  ngOnInit(): void {
    /*this.usuarioService.buscarUsuarios().subscribe(data => {
      this.users = data;
    });*/
  }

}

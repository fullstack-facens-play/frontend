import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { GlobalService } from './global.service';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  private url = '';

  options: any;

  constructor(private http: HttpClient) {
    this.options = {
      headers: new Headers({
        Accept: 'application/json',
        'Content-Type': 'application/json'
      })
    };
  }

  buscarUsuarios(): Observable<any> {
    return this.http.get<any>(this.url);
  }
}

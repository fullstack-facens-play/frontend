import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { GlobalService } from './global.service';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  options: any;

  constructor(private http: HttpClient) {
    this.options = {
      headers: new Headers({
        Accept: 'application/json',
        'Content-Type': 'application/json'
      })
    };
  }

  onGetUserTypes(): Array<string> {
    return ['Aluno', 'Professor'];
  }

    /**
   * Get an access token
   * @param e The email address
   * @param p The password string
   */
    login(e: string, p: string) {
      return this.http.post(GlobalService.getAuthSettings().AUTH_URL, {
        grant_type: 'password',
        client_id: '2',
        client_secret: GlobalService.getAuthSettings().CLIENT_SECRET,
        username: e,
        password: p,
        scope: ''
      }, this.options);
    }
    /**
     * Revoke the authenticated user token
     */
    logout() {
      this.options.headers.Authorization = 'Bearer ' + localStorage.getItem('access_token');
      return this.http.get(GlobalService.getAuthSettings().API_URL + '/token/revoke', this.options);
    }
}

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { GlobalService } from './global.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

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
    return ['', 'Aluno', 'Professor'];
  }

    /**
   * Get an access token
   * @param e The email address
   * @param p The password string
   */
    onLogin(e: string, p: string) {
      return this.http.post(GlobalService.getAuthSettings().AUTH_URL, {
        grant_type: GlobalService.getAuthSettings().GRANT_TYPE,
        client_id: GlobalService.getAuthSettings().CLIENT_ID,
        client_secret: GlobalService.getAuthSettings().CLIENT_SECRET,
        username: e,
        password: p,
        scope: ''
      }, this.options);
    }
    /**
     * Revoke the authenticated user token
     */
    onLogout() {
      const httpOptions = {
        headers: new HttpHeaders({
          'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        })
      };

      return this.http.get(GlobalService.getAuthSettings().API_URL + '/token/revoke', httpOptions);
    }
}

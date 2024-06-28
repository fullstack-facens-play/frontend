import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class GlobalService {

  constructor() { }

  public static getAuthSettings() {
    return new AuthSettings();
  }
}

export class AuthSettings {
  public GRANT_TYPE: string;
  public CLIENT_ID: Number;
  public CLIENT_SECRET: string;
  public AUTH_URL: string;
  public API_URL: string;

  /**
   *
   */
  constructor() {
    this.GRANT_TYPE = 'password';
    this.CLIENT_ID = 8;
    this.CLIENT_SECRET = "euc2h1soJvNHBl34lOWLl4ZCcZP8Ll60yrMsPxIl";
    this.AUTH_URL = "http://localhost:8000/oauth/token";
    this.API_URL = "http://localhost:8000/api";
  }

}

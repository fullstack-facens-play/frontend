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
  public CLIENT_SECRET: string;
  public AUTH_URL: string;
  public API_URL: string;

  /**
   *
   */
  constructor() {
    this.CLIENT_SECRET = "Eqz4gppylctV8lxaZlIgPdLgB7X2hAqlRu3Rgigf";
    this.AUTH_URL = "http://localhost:8000/oauth/token";
    this.API_URL = "http://localhost:8000/api";
  }

}
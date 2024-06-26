import { Injectable } from '@angular/core';
import { Router, ActivatedRouteSnapshot, RouterStateSnapshot, CanActivate } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable()
export class AuthGuardService implements CanActivate {
  /**
   * Constructor
   * @param router The router object
   */
  constructor(
    private router: Router
  ) { }
  /**
   * Can activate function
   * @param next The activated route snapshot object
   * @param state The router state snapshot object
   */
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): Observable<boolean> | boolean  {
    if (
      localStorage.getItem('access_token')
    ) { return true; }
    localStorage.removeItem('access_token');
    this.router.navigateByUrl('/login');
    return false;
  }
}
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { URI } from '../constants/uri';
import {
  LoginResponse,
  RegisterForm,
  RegisterResponse,
} from '../intefaces/auth.models';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor(private http: HttpClient) {}

  login(email: string, password: string) {
    const url = `${environment.apiUrl}${URI.LOGIN}`;
    return this.http.post<LoginResponse>(url, { email, password });
  }

  register(registerForm: RegisterForm) {
    const url = `${environment.apiUrl}${URI.REGISTER}`;
    return this.http.post<RegisterResponse>(url, registerForm);
  }
}

import { InstanceDB } from "./database.models";

export interface User {
  name: string;
  email: string;
}

export interface RegisterForm extends User {
  password: string;
  password_confirmation: string;
}

export interface UserDB extends User, InstanceDB {
}

export interface RegisterResponse {
  message: string;
  data: UserDB;
}

export interface LoginResponse {
  token: string;
}

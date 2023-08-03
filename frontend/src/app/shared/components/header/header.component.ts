import { Component, OnInit } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { AuthService } from '../../../core/services/auth.service';
import {
  UntypedFormBuilder,
  UntypedFormGroup,
  Validators,
} from '@angular/forms';
import { ToastService } from '../bootstrap-components/toast/toast.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})

/**
 * Header Component
 */
export class HeaderComponent implements OnInit {
  title: string;
  modalType!: number;
  navItems = ['Login', 'Latest Latency Testing', 'Registro'];
  validationFormRegister!: UntypedFormGroup;
  validationFormLogin!: UntypedFormGroup;
  buttonTxt: string = '';

  loading: boolean = false;
  submit: boolean = false;

  constructor(
    private modalService: NgbModal,
    private authService: AuthService,
    private formBuilder: UntypedFormBuilder,
    private toastService: ToastService
  ) {
    this.title = 'Sign In';
    this.modalType = 1;
    this.buttonTxt = 'Submit';
  }

  ngOnInit(): void {
    this.validationFormRegister = this.formBuilder.group({
      name: ['', [Validators.required]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required]],
      passwordConfirmation: ['', [Validators.required]],
    });

    this.validationFormLogin = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required]],
    });
  }

  handleModal(modalType: number, content: any) {
    this.modalType = modalType;
    this.title = modalType === 1 ? 'Sign In' : 'Register';

    this.modalService.open(content, { centered: true });
  }

  handleCloseModal() {
    this.submit = this.loading = false;
    this.buttonTxt = 'Submit';
    this.validationFormLogin.reset();
    this.validationFormRegister.reset();
    this.modalService.dismissAll();
  }

  validSubmitLogin() {
    if (!this.validationFormLogin.invalid) {
      // Loading
      this.submit = this.loading = true;
      this.buttonTxt = 'Loading';
      const { email, password } = this.validationFormLogin.value;
      this.authService.login(email, password).subscribe({
        next: console.log,
        error: (badRequest) => {
          this.toastService.show(badRequest.error.message, {
            classname: 'bg-danger text-light',
            delay: 5000,
          });

          this.handleCloseModal();
        },
      });
    }
  }

  validSubmitRegister() {
    if (!this.validationFormRegister.invalid) {
      // Loading
      this.submit = this.loading = true;
      this.buttonTxt = 'Loading';

      this.authService
        .register({
          ...this.validationFormRegister.value,
          password_confirmation:
            this.validationFormRegister.value.passwordConfirmation,
        })
        .subscribe({
          next: console.log,
          error: (badRequest) => {
            this.toastService.show(badRequest.error.message, {
              classname: 'bg-danger text-light',
              delay: 5000,
            });
            this.handleCloseModal();
          },
        });
    }
  }

  get formRegister() {
    return this.validationFormRegister.controls;
  }

  get formLogin() {
    return this.validationFormLogin.controls;
  }
}

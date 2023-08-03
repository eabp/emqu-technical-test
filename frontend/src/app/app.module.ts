import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ComponentsModule } from './shared/components/components.module';
import { ToastsContainer } from './shared/components/bootstrap-components/toast/toast-container.component';
import { NgChartsModule, NgChartsConfiguration } from 'ng2-charts';

@NgModule({
  declarations: [AppComponent],
  imports: [
    NgChartsModule,
    BrowserModule,
    AppRoutingModule,
    NgbModule,
    ComponentsModule,
    HttpClientModule,
    FormsModule,
    BrowserModule,
    ToastsContainer,
  ],
  providers: [
    { provide: NgChartsConfiguration, useValue: { generateColors: false } },
  ],
  bootstrap: [AppComponent],
})
export class AppModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeChartsComponent } from './home-charts/home-charts.component';
import { HomeRoutingModule } from './home-routing.module';



@NgModule({
  declarations: [
    HomeChartsComponent,
  ],
  imports: [
    CommonModule,
    HomeRoutingModule,
  ]
})
export class HomeModule { }

import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeChartsComponent } from './home-charts/home-charts.component';

const routes: Routes = [
  {
    path: '',
    component: HomeChartsComponent,
  },
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HomeRoutingModule { }

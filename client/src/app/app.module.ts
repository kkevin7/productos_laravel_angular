import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavigationComponent } from './components/navigation/navigation.component';
import { ProductoFormComponent } from './components/producto-form/producto-form.component';
import { ProductoListComponent } from './components/producto-list/producto-list.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import {MaterialModele} from './material.module';

@NgModule({
  declarations: [
    AppComponent,
    NavigationComponent,
    ProductoFormComponent,
    ProductoListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MaterialModele
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

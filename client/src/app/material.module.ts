import {NgModule} from '@angular/core';
import {MatButtonModule} from '@angular/material';
import {MatMenuModule} from '@angular/material/menu';
@NgModule({
    imports: [
        MatButtonModule,
        MatMenuModule
    ],
    exports: [
        MatButtonModule,
        MatMenuModule
    ]
})
export class MaterialModele {}
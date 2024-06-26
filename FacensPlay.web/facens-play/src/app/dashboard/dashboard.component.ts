import { Component } from '@angular/core';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent {
  courses = [
    {
      title: 'Fundamentos de programação com C#',
      level: 'Medium',
      duration: '72h',
      score: '★★★☆☆'
    },
    {
      title: 'Design Paramétrico na prática',
      level: 'Expert',
      duration: '56h',
      score: '★★★★☆'
    },
    {
      title: 'Desbravando os princípios do S.O.L.I.D',
      level: 'Expert',
      duration: '18h',
      score: '★★★★★'
    }
  ];

  constructor() { }

  ngOnInit(): void {
  }
}
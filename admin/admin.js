const show = document.getElementById('show');
const showd = document.getElementById('showd');
const a = document.getElementById('add-student');







// show.addEventListener("click"),()=>{
//      (showd.style.display='block')
//         showd.style.display='none';
//         addstudent.style.display='block';


//     }
    show.addEventListener('click',()=>(
        showd.style.display='none',
        a.style.display='block'
    ))
    






// function searchStudent() {
//     // 1. الحصول على قيمة البحث
//     const studentId = document.getElementById('searchId').value.trim();
//     const tableContainer = document.getElementById('studentTableContainer');
//     const tbody = document.querySelector('#basic tbody');
   
//     // 2. التحقق من إدخال المعرف
//     if(!studentId) {
//         alert('الرجاء إدخال معرف الطالب');
//         return;
//     }
    
//     // 3. مسح البيانات القديمة
//     tbody.innerHTML = '';
//     tableContainer.style.display = 'none';
    
//     // 4. جلب البيانات من الخادم (AJAX)
//     fetch(`search_student.php?student_id=${studentId}`)
//         .then(response => response.json())
//         .then(data => {
//             if(data.error) {
//                 alert(data.error);
//                 return;
//             }
            
//             // 5. عرض البيانات في الجدول
//             const row = document.createElement('tr');
//             row.innerHTML = `
//                 <td>${data.student_id}</td>
//                 <td>${data.student_name}</td>
//                 <td>${data.subjects.join('، ')}</td>
//             `;
//             tbody.appendChild(row);
            
//             // 6. إظهار الجدول
//             tableContainer.style.display = 'block';
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             alert('حدث خطأ أثناء جلب البيانات');
//         });
// }
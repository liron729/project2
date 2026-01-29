# Halco Gipser GmbH Website

Professional construction company website built with React, FastAPI, and MongoDB.

## 🚀 Quick Start

### Backend
```bash
cd backend
python -m venv venv
source venv/bin/activate  # Windows: venv\Scripts\activate
pip install -r requirements.txt
uvicorn server:app --reload --port 8001
```

### Frontend
```bash
cd frontend
yarn install
yarn start
```

## 📁 Project Structure

```
halco-gipser-website/
├── frontend/
│   ├── src/
│   │   ├── components/
│   │   │   ├── Header.jsx
│   │   │   ├── Hero.jsx
│   │   │   ├── Services.jsx
│   │   │   ├── Projects.jsx
│   │   │   ├── About.jsx
│   │   │   ├── Contact.jsx
│   │   │   ├── Footer.jsx
│   │   │   └── ui/ (Shadcn components)
│   │   ├── mock.js (Update company info here!)
│   │   ├── App.js
│   │   └── index.css
│   ├── package.json
│   └── .env (Create this: REACT_APP_BACKEND_URL=http://localhost:8001)
│
├── backend/
│   ├── server.py
│   ├── requirements.txt
│   └── .env (Create this: MONGO_URL=mongodb://localhost:27017)
│
├── contracts.md (API documentation)
└── SETUP_GUIDE.md (Detailed setup instructions)
```

## ✨ Features

- ✅ Professional hero section
- ✅ Services showcase (6 services)
- ✅ Project portfolio with filtering
- ✅ About company section
- ✅ Working contact form → MongoDB
- ✅ Responsive design
- ✅ German language
- ✅ Professional orange/gray color scheme

## 🎨 Customization

**Update company info**: Edit `frontend/src/mock.js`
**Change colors**: Edit `frontend/tailwind.config.js`
**Add logo**: Update `frontend/src/components/Header.jsx`

## 📝 Environment Variables

### Frontend (.env)
```
REACT_APP_BACKEND_URL=http://localhost:8001
```

### Backend (.env)
```
MONGO_URL=mongodb://localhost:27017
DB_NAME=halco_gipser
```

## 🌐 Deployment

**Easiest**: Deploy on Emergent platform (already configured!)

**Alternative**: 
- Frontend: Vercel/Netlify
- Backend: Railway/Render
- Database: MongoDB Atlas

See `SETUP_GUIDE.md` for detailed deployment instructions.

## 📊 View Contact Submissions

API: `http://localhost:8001/api/contact`

## 🛠️ Tech Stack

- **Frontend**: React 19, Tailwind CSS, Shadcn UI
- **Backend**: FastAPI (Python), Pydantic
- **Database**: MongoDB
- **Styling**: Tailwind CSS, Lucide Icons

## 📞 API Endpoints

- `GET /api/` - Health check
- `POST /api/contact` - Submit contact form
- `GET /api/contact` - Get all submissions
- `GET /api/contact/{id}` - Get single submission

---

Built with ❤️ for Halco Gipser GmbH

import { CanvasContainer } from '@components/3D/CanvasContainer'
import { Something } from '@components/Something'

export function App() {
  return (
    <main className="relative h-screen w-screen overflow-hidden">
      <CanvasContainer />
      <Something />
    </main>
  )
}
